import { fetchGraphQL } from "@/lib/graphql";

type Service = {
  id: string;
  title: string;
  slug: string;
  excerpt: string | null;
  serviceDetails: {
    icon: string | null;
    deliverables: Array<{ text: string }> | null;
    ctaLink: {
      url: string;
      title: string;
      target: string | null;
    } | null;
  };
};

type ServicesData = {
  services: {
    nodes: Service[];
  };
};

const servicesQuery = `
  query Services {
    services {
      nodes {
        id
        title
        slug
        excerpt
        serviceDetails {
          icon
          deliverables {
            text
          }
          ctaLink: cta {
            url
            title
            target
          }
        }
      }
    }
  }
`;

export default async function Home() {
  const { services } = await fetchGraphQL<ServicesData>(servicesQuery);

  return (
    <main className="mx-auto w-full max-w-5xl px-6 py-16 sm:px-10">
      <header className="mb-10">
        <p className="mb-2 text-sm font-medium uppercase tracking-widest text-zinc-500">
          WordPress GraphQL test
        </p>
        <h1 className="text-4xl font-semibold tracking-tight">Services</h1>
      </header>

      <div className="grid gap-6 sm:grid-cols-2">
        {services.nodes.map((service) => (
          <article key={service.id} className="rounded-2xl border border-zinc-200 p-6">
            {service.serviceDetails.icon && (
              <p className="mb-3 text-sm text-zinc-500">{service.serviceDetails.icon}</p>
            )}
            <h2 className="text-2xl font-semibold">{service.title}</h2>
            {service.excerpt && (
              <div
                className="mt-3 leading-7 text-zinc-600"
                dangerouslySetInnerHTML={{ __html: service.excerpt }}
              />
            )}
            {service.serviceDetails.deliverables?.length ? (
              <ul className="mt-5 list-disc space-y-2 pl-5 text-zinc-700">
                {service.serviceDetails.deliverables.map((deliverable) => (
                  <li key={deliverable.text}>{deliverable.text}</li>
                ))}
              </ul>
            ) : null}
            {service.serviceDetails.ctaLink && (
              <a
                className="mt-6 inline-block font-medium underline underline-offset-4"
                href={service.serviceDetails.ctaLink.url}
                target={service.serviceDetails.ctaLink.target || undefined}
              >
                {service.serviceDetails.ctaLink.title}
              </a>
            )}
          </article>
        ))}
      </div>
    </main>
  );
}
