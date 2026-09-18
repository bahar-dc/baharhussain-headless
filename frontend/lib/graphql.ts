type GraphQLError = {
  message: string;
};

type GraphQLResponse<T> = {
  data?: T;
  errors?: GraphQLError[];
};

export async function fetchGraphQL<T>(query: string): Promise<T> {
  const endpoint = process.env.WORDPRESS_GRAPHQL_URL;

  if (!endpoint) {
    throw new Error("WORDPRESS_GRAPHQL_URL is not configured");
  }

  const response = await fetch(endpoint, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ query }),
    next: { revalidate: 60 },
  });

  if (!response.ok) {
    throw new Error(`GraphQL request failed with status ${response.status}`);
  }

  const result = (await response.json()) as GraphQLResponse<T>;

  if (result.errors?.length) {
    throw new Error(result.errors.map(({ message }) => message).join("\n"));
  }

  if (!result.data) {
    throw new Error("GraphQL response did not include data");
  }

  return result.data;
}
