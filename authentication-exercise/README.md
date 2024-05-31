## I've Learned:

- I've explored how to use the Laravel's authentication classes via ``Auth`` facade.
- Behind the scenes, Laravel's authentication system uses sessions to maintain the user's logged-in state across multiple requests.
- I can protect routes by attaching the middleware to a route definition. This will only allow authenticated user to access a given route. The syntax is ``->middleware('auth)``
