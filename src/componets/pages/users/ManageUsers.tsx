import React, { useEffect, useState } from 'react'
import { Link } from 'react-router-dom'
import api from '../../../config'
import type { users } from '../../../interface'

function ManageUsers() {
    let [users, setUsers] = useState<users[]>([])

    useEffect(() => {
        getDataUsers()
    }, [])

    const getDataUsers = () => {
    api.get('users')
        .then((res) => {
        console.log(res.data)
        setUsers(res.data) 
        })
        .catch((err) => {
        console.error(err);
        })
    }


  return (
    <>
        <div className="container-xxl flex-grow-1 container-p-y">
        <h4 className="fw-bold py-3 mb-4">
          <span className="text-muted fw-light">Users /</span> Manage
        </h4>

        <Link to={"/create-users"} className='btn btn-success'>Add New</Link>

        <div className="card mt-3">
          <div className="table-responsive">
            <table className="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>email</th>
                  <th>address</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                {
                    users.map((item)=>
                        <tr>
                            <td>{item.id}</td>
                            <td>{item.name}</td>
                            <td>{item.email}</td>
                            <td>{item.address}</td>
                            <td>{item.role}</td>
                            
                        </tr>
                    )
                }
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </>
  )
}

export default ManageUsers