export type App = {
  name: string
};

export type User = {
  id: string
  name: string
  email: string
  verified: boolean
};

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
    app: App;
};
