# lmbRequestDispatcher
lmbRequestDispatcher is a class that performs the main part of [RequestDispatching](./request_dispatching.md). lmbRequestDispatcher uses [lmbRequestExtractors] to determine current lmbService and Action. lmbRequestDispatcher :: dispatch($request) method returns lmbDispatchedRequest.

lmbRequestDispatchingFilter is a common place where lmbRequestDispatcher is used.

There's a request dispatching schema on RequestDispatching page.
