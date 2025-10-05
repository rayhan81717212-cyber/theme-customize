import axios from 'axios';
import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import api from '../../../config';

  interface Roles {
    id: number;
    name: string;
  }

function ManageRoles() {
  const [roles, setRoles] = useState([]); 

  

    useEffect(()=>{
        getRoles()
    },[])

   const getRoles =()=>{
     api.get("roles")
      .then((res) => {
        setRoles(res.data)
        // console.log(res.data)
      })
      .catch((err) => {
        console.error("API Error:", err);
      });
   }


  return (
    <>
      <div className="container-xxl flex-grow-1 container-p-y">
        <h4 className="fw-bold py-3 mb-4">
          <span className="text-muted fw-light">Roles /</span> Manage
        </h4>

        <Link to={"/create-roles"} className='btn btn-success'>Add New</Link>

        <div className="card mt-3">
          <div className="table-responsive">
            <table className="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Role Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                {
                  roles.map((item:Roles) => (
                    <tr key={item.id}>
                      <td>{item.id}</td>
                      <td>{item.name}</td>
                      <td>
                        <button className='btn btn-sm btn-primary'>Edit</button>
                      </td>
                      <td>
                          <div className="d-flex">
                              <Link to={`/post/details/${item.id}`} type='button' className='btn btn-icon btn-outline-success'>
                                  <span className='tf-icons bx bx-search'></span>
                                  
                              </Link>
                              <Link to={`/post/edit/${item.id}`} type='button' className='btn btn-icon btn-outline-success'>
                                  <span className='tf-icons bx bx-edit'></span>
                              </Link>
                              <button type='button' className='btn btn-icon btn-outline-danger'>
                                  <span className='tf-icons bx bx-trash'></span>
                              </button>
                          </div>
                      </td>
                    </tr>
                  ))
                }
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </>
  );
}

export default ManageRoles;
