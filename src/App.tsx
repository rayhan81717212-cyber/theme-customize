import './App.css'
import Footer from './componets/layout/Footer'
import Navbar from './componets/layout/Navbar'
import Sidebar from './componets/layout/Sidebar'
import Dashboard from './componets/pages/Dashboard'

function App() {

  return (
    <>
       {/* <!-- Layout wrapper --> */}
    <div className="layout-wrapper layout-content-navbar">
      <div className="layout-container">
        {/* Menu */}
          <Sidebar/>

        {/* / Menu */}

        {/* Layout container */}
        <div className="layout-page">
            {/* Navbar */}
            <Navbar/>
            {/* / Navbar */}

            {/* Content wrapper */}
              <Dashboard/>
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

export default App
