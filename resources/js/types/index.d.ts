export type PlanInterval = {
  amount: number
  frame: string
  count: number
};

export type Plan = {
  id: string
  stripe_id: string
  product_id: string
  nickname: string
  interval: PlanInterval
};

export type App = {
  name: string
  plans: Plan[]
};

export type Subscription = {
  trial: boolean
  plan?: Plan
};

export type User = {
  id: string
  name: string
  email: string
  verified: boolean
  subscription: Subscription
};

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
    app: App;
};
