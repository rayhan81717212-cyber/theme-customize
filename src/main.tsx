import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
// import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap/dist/js/bootstrap.bundle.min.js"
import { createBrowserRouter, RouterProvider } from 'react-router-dom'
import Layout from './componets/layout/Layout.tsx'
import Dashboard from './componets/pages/Dashboard.tsx'
import Product from './componets/pages/Product.tsx'
import ManagePosts from './componets/pages/post/ManagePosts.tsx'
import Createpost from './componets/pages/post/Createpost.tsx'
import DetailsPost from './componets/pages/post/DetailsPost.tsx'
import EditPost from './componets/pages/post/EditPost.tsx'
import ManageRoles from './componets/pages/role/ManageRoles.tsx'
import CreateRoll from './componets/pages/role/CreateRoll.tsx'
import ManageUsers from './componets/pages/users/ManageUsers.tsx'
import CreateUsers from './componets/pages/users/CreateUsers.tsx'
import EditRole from './componets/pages/role/EditRole.tsx'
import Login from './componets/pages/Login.tsx'
import {requireAuth, redirectIfAuthenticated} from "./utils/auth.ts"

const router = createBrowserRouter([
  {path:"/", element:<Layout/>, loader: requireAuth,
    children:[
      {index:true, element: <Dashboard/>},
      {path:"/dashboard", element: <Dashboard/>},
      {path:"/product", element: <Product/>},
      {path:"/managePost", element: <ManagePosts/>},
      {path:"/managePost", element: <ManagePosts/>},
      {path:"/create-post", element: <Createpost/>},
      {path:"/post/details/:id", element: <DetailsPost/>},
      {path:"/post/edit/:id", element: <EditPost/>},
      {path:"/manage-roles", element: <ManageRoles />},
      {path:"/create-roles", element: <CreateRoll />},
      {path:"/update-roles/:id", element: <EditRole />},
      {path:"/users", element: <ManageUsers />},
      {path:"/create-users", element: <CreateUsers />},
    ]
  },
  {path:"/pos", element: <h1>POS</h1>},
  { path:"login", element: <Login/>, loader: redirectIfAuthenticated},

])

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <RouterProvider router={router} />
  </StrictMode>,
)
