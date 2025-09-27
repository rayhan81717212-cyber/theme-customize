import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.tsx'
// import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap/dist/js/bootstrap.bundle.min.js"
import { createBrowserRouter, RouterProvider } from 'react-router-dom'
import Layout from './componets/layout/Layout.tsx'
import Dashboard from './componets/pages/Dashboard.tsx'
import Product from './componets/pages/Product.tsx'
import ManagePosts from './componets/pages/post/ManagePosts.tsx'
import Createpost from './componets/pages/post/Createpost.tsx'

const router = createBrowserRouter([
  {path:"/", element:<Layout/>,
    children:[
      {index:true, element: <Dashboard/>},
      {path:"/dashboard", element: <Dashboard/>},
      {path:"/users", element: <h1>users</h1>},
      {path:"/product", element: <Product/>},
      {path:"/managePost", element: <ManagePosts/>},
      {path:"/managePost", element: <ManagePosts/>},
      {path:"/create-post", element: <Createpost/>},
    ]
  },
  {path:"/pos", element: <h1>POS</h1>},
  { path:"login", element: <h1>Login</h1>},

])

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <RouterProvider router={router} />
  </StrictMode>,
)
