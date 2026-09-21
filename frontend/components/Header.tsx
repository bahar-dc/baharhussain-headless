import { fetchGraphQL } from "@/lib/graphql";
import HeaderClient, { type HeaderMenuItem } from "@/components/HeaderClient";

const headerMenuQuery = `
  query TestHeaderMenu {
    menus(where: { slug: "header-menu" }) {
      nodes {
        id
        name
        slug
        menuItems {
          nodes {
            id
            label
            url
            path
            parentId
          }
        }
      }
    }
  }
`;

type WordPressMenuItem = {
  id: string;
  label: string;
  url: string;
  path: string | null;
  parentId: string | null;
};

type HeaderMenuResponse = {
  menus: {
    nodes: Array<{
      id: string;
      name: string;
      slug: string;
      menuItems: { nodes: WordPressMenuItem[] } | null;
    }>;
  };
};

function toHeaderMenuItem(item: WordPressMenuItem, wordpressOrigin: string): HeaderMenuItem {
  const wordpressUrl = new URL(item.url || item.path || "/", wordpressOrigin);
  const external = wordpressUrl.origin !== wordpressOrigin && !item.path?.startsWith("/");

  if (external) {
    return { id: item.id, label: item.label, href: item.url, external: true };
  }

  const href = item.path?.startsWith("/")
    ? item.path
    : `${wordpressUrl.pathname}${wordpressUrl.search}${wordpressUrl.hash}`;

  return { id: item.id, label: item.label, href, external: false };
}

export default async function Header() {
  const { menus } = await fetchGraphQL<HeaderMenuResponse>(headerMenuQuery);
  const menu = menus.nodes.find(({ slug }) => slug === "header-menu");
  const wordpressOrigin = new URL(process.env.WORDPRESS_GRAPHQL_URL!).origin;
  const navigation = menu?.menuItems?.nodes.map((item) => toHeaderMenuItem(item, wordpressOrigin)) ?? [];

  return <HeaderClient navigation={navigation} />;
}
