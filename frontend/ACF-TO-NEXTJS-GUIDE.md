# How to display ACF fields in Next.js

This guide uses your project's footer as an example. The WordPress backend stores the content, WPGraphQL exposes it, and your Next.js component fetches and displays it.

```text
Create an ACF field → Save its value in WordPress
                   → Query that value through GraphQL
                   → Fetch it in Next.js → Render it in JSX
```

Editing WordPress's `footer.php` changes the WordPress theme output. Your headless website uses `frontend/components/Footer.tsx`, so that is the component to edit for the Next.js footer.

## 1. Understand the names

Here is the query structure currently used in your component:

```graphql
query FooterContent {
  themeOptions {
    baharHussainTheme {
      thsVarFooterLogoText
    }
  }
}
```

| Name | Meaning |
| --- | --- |
| `/graphql` | The API endpoint where Next.js sends requests. |
| `FooterContent` | An optional operation name you choose to identify this query. |
| `themeOptions` | The root GraphQL field for your ACF options page. |
| `baharHussainTheme` | The GraphQL field for your ACF field group. |
| `thsVarFooterLogoText` | One field within that group. |

The first two nested names are containers, not saved footer text. The field inside them supplies the text.

These names must exist in the backend schema. The examples match the current frontend code and local ACF configuration, but you should confirm them in the running WordPress GraphQL IDE. A TypeScript check cannot confirm that a GraphQL field exists.

## 2. Create the field in WordPress

Ensure the backend has an active ACF-compatible plugin, WPGraphQL, and WPGraphQL for ACF, with options-page support available. This project uses Secure Custom Fields and the GraphQL plugins.

Open the custom fields administration screen and edit your theme field group. Add a field such as:

| Setting | Example |
| --- | --- |
| Field Label | Footer Logo Text |
| Field Name | `ths_var_footer_logo_text` |
| Field Type | Textarea |
| Location rule | Options Page is equal to Theme Options |

The **label** is what the editor sees in WordPress. The **field name** identifies the saved value. They are different settings.

Use the existing Footer Logo Text field in this project rather than creating a duplicate. For a new field, choose a unique name.

Save the field group. Leave the default value empty if you want no fallback content.

## 3. Save actual content

Open **Theme Options**, enter text in **Footer Logo Text**, and click **Update**.

Creating a field only creates the input control. You must also save its value on the options page.

Global content such as footer details belongs on an options page. Content that varies per page belongs on that page or post; see the page-specific example later in this guide.

## 4. Make the field available in GraphQL

Check the GraphQL settings for both the options page and its field group:

1. Enable **Show in GraphQL** for the options page.
2. Enable **Show in GraphQL** for the field group.
3. Confirm the group's GraphQL name. This project's local JSON sets `graphql_field_name` to `baharHussainTheme`.
4. If the individual field has a GraphQL visibility setting, make sure it is enabled.
5. Save the settings.

Use the GraphQL IDE's documentation explorer or autocomplete to discover the actual root field and nested field names. Do not guess names from labels alone.

In this project, local definitions are stored in:

- `backend/app/public/wp-content/themes/baharhussain/acf-json/group_57d73204c2ca0.json`
- `backend/app/public/wp-content/themes/baharhussain/acf-json/ui_options_page_689e11ad9fe79.json`

If you transfer JSON changes to another WordPress installation, check the custom fields screen for available synchronization and verify that the running schema reflects the changes. Merely changing the Next.js query does not create a backend field.

Only expose content intended to be publicly queryable. A theme group may also contain unrelated settings, so review individual field visibility when exposing the group.

## 5. Test the query before writing JSX

Open the WordPress GraphQL IDE and run the complete query from section 1, including the outer `query` and braces.

An example successful response is:

```json
{
  "data": {
    "themeOptions": {
      "baharHussainTheme": {
        "thsVarFooterLogoText": "Your saved footer description"
      }
    }
  }
}
```

Your ACF field name `ths_var_footer_logo_text` is represented as `thsVarFooterLogoText` in the current query. Custom GraphQL names can override this conversion, so autocomplete is the final check.

If the IDE reports `Cannot query field`, fix the name or exposure settings first. If the field exists but returns `null`, check the saved value and field-group location.

The API endpoint in your local setup is:

```text
http://baharhussain-headless.local/graphql
```

That is an API address, not a normal webpage. Test it with the GraphQL IDE or a GraphQL request. The local WordPress site must be running.

## 6. Configure the Next.js endpoint

Your project already has this setting in `frontend/.env.local`:

```dotenv
WORDPRESS_GRAPHQL_URL=http://baharhussain-headless.local/graphql
```

Restart the development server after changing environment configuration. A deployed Next.js site needs an endpoint reachable from its hosting server; a local `.local` address is for local development.

Keep this variable server-side for the workflow below. There is no need to rename it with a `NEXT_PUBLIC_` prefix.

## 7. Use the existing fetch helper

Your helper is in `frontend/lib/graphql.ts`. Import it with:

```tsx
import { fetchGraphQL } from "@/lib/graphql";
```

The helper reads the endpoint, sends a POST request containing your query, checks HTTP and GraphQL errors, and returns `result.data`.

That last detail matters: although the raw API response has an outer `data` property, the helper has already removed that wrapper. Access `result.themeOptions`, not `result.data.themeOptions`.

The helper currently uses:

```tsx
next: { revalidate: 60 }
```

This allows cached data to be revalidated after 60 seconds. It is not a live push connection: an already open page does not automatically update when you save WordPress. Refresh or navigate again, and allow for revalidation; a request may initially receive stale data while it refreshes.

## 8. Define the response type

```tsx
type FooterTextResponse = {
  themeOptions: {
    baharHussainTheme: {
      thsVarFooterLogoText: string | null;
    } | null;
  } | null;
};
```

This is a **TypeScript type, not a function**. It describes the expected response structure.

- `string` means text.
- `| null` means the value may be absent.
- Nested braces describe nested objects.
- The property names match the GraphQL response.

Types provide autocomplete and catch incorrect property access while developing. They do not fetch content, create GraphQL fields, or validate the actual response at runtime.

The type name itself is your choice: `FooterTextResponse`, `FooterResponse`, or another clear name. Renaming a type does not rename the backend data.

## 9. Fetch and render a field in a Server Component

For a small standalone example, create `frontend/components/FooterLogoText.tsx`:

```tsx
import { fetchGraphQL } from "@/lib/graphql";

const footerTextQuery = `
  query FooterText {
    themeOptions {
      baharHussainTheme {
        thsVarFooterLogoText
      }
    }
  }
`;

type FooterTextResponse = {
  themeOptions: {
    baharHussainTheme: {
      thsVarFooterLogoText: string | null;
    } | null;
  } | null;
};

export default async function FooterLogoText() {
  const data = await fetchGraphQL<FooterTextResponse>(footerTextQuery);
  const text = data.themeOptions?.baharHussainTheme?.thsVarFooterLogoText;

  if (!text) return null;

  return <p>{text}</p>;
}
```

What each part does:

1. `footerTextQuery` specifies the content requested from WordPress.
2. `<FooterTextResponse>` tells TypeScript what response shape to expect.
3. `await` waits for the asynchronous request.
4. `?.` safely accesses a property when the parent may be `null` or `undefined`.
5. `if (!text) return null` displays nothing when the value is empty.
6. `<p>{text}</p>` displays the saved text. React escapes plain text for you.

Do not add `"use client"` to this component. Use it from a Server Component, such as your existing footer:

```tsx
import FooterLogoText from "@/components/FooterLogoText";

export default function Footer() {
  return (
    <footer>
      <FooterLogoText />
    </footer>
  );
}
```

This is an educational minimal example, not a replacement for your full footer. Your existing `Footer.tsx` already fetches the footer fields together; normally extend that query instead of adding a separate request for every field.

If a component needs browser interactions, fetch the content in a Server Component and pass the needed values into a Client Component as props.

## 10. Add another field to the existing footer

For example, to display the existing location field:

First include it in the GraphQL selection:

```graphql
themeOptions {
  baharHussainTheme {
    thsVarFooterLogoText
    thsVarFooterLocation
  }
}
```

Then include it in the nested settings type:

```tsx
type FooterSettings = {
  thsVarFooterLogoText: string | null;
  thsVarFooterLocation: string | null;
};
```

Finally read and render it:

```tsx
const footer = data.themeOptions?.baharHussainTheme;

// Inside the component's returned JSX:
{footer?.thsVarFooterLocation && <p>{footer.thsVarFooterLocation}</p>}
```

These are additions to your existing query, type, and JSX. Keep any other fields already present.

Creating a field in WordPress alone does not display it in Next.js. You must request it and render it.

## 11. Handle ACF Link fields

A Text field returns a scalar string. An ACF Link field returns an object, so request its child properties:

```graphql
thsVarFooterMeetingLink {
  title
  url
  target
}
```

Use the corresponding type:

```tsx
type AcfLink = {
  title: string | null;
  url: string | null;
  target: string | null;
};

type FooterSettings = {
  thsVarFooterMeetingLink: AcfLink | null;
};
```

Read the value, then use it in the returned JSX:

```tsx
const meetingLink = data.themeOptions?.baharHussainTheme?.thsVarFooterMeetingLink;

// Inside the component's returned JSX:
{meetingLink?.url && meetingLink.title && (
  <a
    href={meetingLink.url}
    target={meetingLink.target || undefined}
    rel={meetingLink.target === "_blank" ? "noopener noreferrer" : undefined}
  >
    {meetingLink.title}
  </a>
)}
```

This displays only a saved link with a URL and title. It adds no fallback button text or destination.

For internal navigation, use `next/link` and convert absolute WordPress URLs to the corresponding frontend paths. Your existing footer contains URL normalization for this purpose. External destinations such as a meeting booking service can use `<a>`.

Image, repeater, relationship, and other complex fields have their own response structures. Inspect their available subfields in the IDE instead of assuming that they return strings or simple URLs.

## 12. Why menus and options share one response type

Your current footer query requests three top-level fields:

```text
footerMenu
legalMenu
themeOptions
```

Therefore its TypeScript response type describes all three. `themeOptions` is not inside a menu; it is alongside the menus in the same response.

The current name `FooterMenusResponse` is just a developer-chosen type name. `FooterResponse` would describe its broader purpose more clearly. Changing that name and its TypeScript references does not change the query or backend schema.

Also distinguish GraphQL aliases from schema names:

```graphql
query FooterContent {
  footerSettings: themeOptions {
    baharHussainTheme {
      thsVarFooterLogoText
    }
  }
}
```

This keeps the backend field `themeOptions`, but names the response property `footerSettings`. Your type and property access must then use `footerSettings` too.

Changing an operation name such as `FooterContent` does not change response properties. Changing a backend GraphQL name requires updating queries that use it.

## 13. Fields saved on a page instead of an options page

A global footer field is fetched through the options page. A field saved on an individual page is fetched through that page.

An illustrative query is:

```graphql
query AboutPageContent {
  page(id: "/about/", idType: URI) {
    title
    aboutFields {
      introduction
    }
  }
}
```

`aboutFields` and `introduction` are example names, not confirmed fields in this project. Replace them with names from your schema. Assign the group to the intended page, save its value on that page, and confirm its visibility and publication status.

The Next.js steps remain the same: query the value, describe the response type, fetch it, and render it.

## 14. Troubleshooting

| Symptom | What to check |
| --- | --- |
| `Cannot query field "themeOptions"` | Options page visibility, active GraphQL plugins, and the actual root name in IDE autocomplete. |
| `Cannot query field "baharHussainTheme"` | Field-group GraphQL name, visibility, and location rule. |
| `Cannot query field "thsVarFooterLogoText"` | Actual field name, individual visibility, and whether backend field definitions are synchronized. |
| A field returns `null` or empty text | Save the value on the correct options page or post. Check the field name and storage location. |
| GraphQL works, but nothing appears | Confirm property access matches the response and that the component is included in the page or layout. |
| Changes do not appear immediately | Refresh after the cache interval and allow revalidation. Check any WordPress or hosting cache too. |
| `WORDPRESS_GRAPHQL_URL is not configured` | Set the environment variable and restart Next.js. |
| Connection refused or request fails | Start WordPress and confirm the endpoint is reachable from the Next.js server. |
| A Link field causes a query error | Select its object subfields (`title`, `url`, `target`). |
| TypeScript says a property does not exist | Add it to the correct nested response type and check spelling. |
| WordPress footer changed but Next.js did not | Update `frontend/components/Footer.tsx`; the headless frontend does not render `footer.php`. |

If the query works while logged into WordPress but fails for visitors, test it without authentication and check public visibility. A successful IDE request as an administrator does not alone prove anonymous frontend access.

## 15. Checklist for every new field

- [ ] Create the field with the correct type and a unique field name.
- [ ] Set the field-group location to the correct options page or content type.
- [ ] Save a value in WordPress.
- [ ] Confirm the page/group/field is exposed in GraphQL as required.
- [ ] Test a complete query and verify the returned value.
- [ ] Add the field to your Next.js query.
- [ ] Update the TypeScript response type to match.
- [ ] Read the value and display it in JSX.
- [ ] Handle empty values without unwanted fallback text.
- [ ] Check the actual frontend after saving and revalidation.

From the `frontend` directory, code checks are available with:

```bash
npx tsc --noEmit
npm run lint -- components/Footer.tsx
```

These check frontend code. You still need a successful GraphQL request and a frontend check to confirm the complete data path.

## Relevant project files

- [Footer component](components/Footer.tsx)
- [GraphQL fetch helper](lib/graphql.ts)
- [Theme ACF field group](../backend/app/public/wp-content/themes/baharhussain/acf-json/group_57d73204c2ca0.json)
- [ACF options page](../backend/app/public/wp-content/themes/baharhussain/acf-json/ui_options_page_689e11ad9fe79.json)

The examples above are based on these local project files and the installed Next.js documentation. GraphQL schema names must still be verified against your running backend.
