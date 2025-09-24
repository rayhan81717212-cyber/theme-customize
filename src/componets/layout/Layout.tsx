// import React from 'react'
import Footer from './Footer'
import Navbar from './Navbar'
import Sidebar from './Sidebar'
import React, { useState } from 'react'; 
import "../../../public/assets/vendor/css/custom.css"
import { Outlet } from 'react-router-dom';

function Layout() {
  const [asidebar, setAsidevar] = useState(false);
  return (
    <>
          {/* <!-- Layout wrapper --> */}
            <div className="layout-wrapper layout-content-navbar">
            <div className="layout-container">
                {/* Menu */}
                <Sidebar asidebar={asidebar} setAsidevar={setAsidevar}/>

                {/* / Menu */}

                {/* Layout container */}
                <div className="layout-page">
                    {/* Navbar */}
                    <Navbar asidebar={asidebar} setAsidevar={setAsidevar}/>
                    {/* / Navbar */}

                    {/* Content wrapper */}
                    <Outlet/>
                    {/* Content wrapper */}

                    {/* Footer */}
                    <Footer/>
                    {/* / Footer */}
                </div>
                {/* / Layout page */}
            </div>
            
            {/* Overlay */}
            <div className="layout-overlay layout-menu-toggle"></div>
            </div>
            {/* / Layout wrapper */}
    
    </>
  )
}

export default Layout