import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.tsx'
// import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap/dist/js/bootstrap.bundle.min.js"
import { createBrowserRouter, RouterProvider } from 'react-router-dom'
import Layout from './componets/layout/Layout.tsx'
import Dashboard from './componets/pages/Dashboard.tsx'

const router = createBrowserRouter([
  {path:"/", element:<Layout/>,
    children:[
      {index:true, element: <Dashboard/>},
      {path:"product", element: <h1>Rhat Boss ꧁ঔৣ☬✞𝓓𝖔𝖓✞☬ঔৣ꧂</h1>}
    ]
  },
  { path:"login", element: <h1>Login</h1>},

])

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <RouterProvider router={router} />
  </StrictMode>,
)
