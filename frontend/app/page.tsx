import HomeHero from "@/components/blocks/HomeHero";
import { fetchGraphQL } from "@/lib/graphql";

type HomeHeroBlock = {
  __typename: "ThsHomeHero";
  name: string;
  clientId: string;
  parentClientId: string | null;
  renderedHtml: string | null;
  attributes: {
    eyebrow: string | null;
    title: string | null;
    description: string | null;
    imageUrl: string | null;
    imageAlt: string | null;
    primaryLabel: string | null;
    primaryUrl: string | null;
    secondaryLabel: string | null;
    secondaryUrl: string | null;
  };
};

type HomeData = {
  nodeByUri: {
    editorBlocks: HomeHeroBlock[];
  } | null;
};

const homeQuery = `
  query HomepageBlocks {
    nodeByUri(uri: "/") {
      ... on Page {
        editorBlocks(flat: false) {
          __typename
          name
          clientId
          parentClientId
          renderedHtml
          ... on ThsHomeHero {
            attributes {
              eyebrow
              title
              description
              imageUrl
              imageAlt
              primaryLabel
              primaryUrl
              secondaryLabel
              secondaryUrl
            }
          }
        }
      }
    }
  }
`;

export default async function Home() {
  const data = await fetchGraphQL<HomeData>(homeQuery);
  const blocks = data.nodeByUri?.editorBlocks ?? [];

  return (
    <>
      {blocks.map((block) => {
        if (block.__typename !== "ThsHomeHero") {
          return null;
        }

        return <HomeHero key={block.clientId} {...block.attributes} />;
      })}
    </>
  );
}
