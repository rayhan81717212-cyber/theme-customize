import { useEffect, useState } from 'react'
import { Link } from 'react-router-dom'
import api from '../../../config'
import type { users } from '../../../interface/userInterface'

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
// user Delete Function
const [userId, setUserId] = useState <number>(0)
    function handleModal(id: any){
      // alert("Delete Confirm ")
      // // setUserId(id);
      api.delete(`delete-user?id=${id}`)
      .then((res)=>{
        console.log(res.data);
        getDataUsers()
      })
      .catch((err)=>console.log(err))
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
                            <td>
                              <div className="d-flex">
                                 <Link to={`/post/details/${item.id}`} type='button' className='btn btn-icon btn-outline-success'>
                                     <span className='tf-icons bx bx-search'></span>
                                     
                                 </Link>
                                 <Link to={`/post/edit/${item.id}`} type='button' className='btn btn-icon btn-outline-success'>
                                     <span className='tf-icons bx bx-edit'></span>
                                 </Link>
                                 <button onClick={()=> setUserId(item.id)} type='button' className='btn btn-icon btn-outline-danger' data-bs-toggle="modal" data-bs-target="#deleteModal">
                                     <span className='tf-icons bx bx-trash'></span>
                                 </button>
                             </div>
                            </td>
                            
                        </tr>
                    )
                }
              </tbody>
            </table>
          </div>
        </div>
      </div>
      {/* <!-- Modal --> */}
      <div className="modal fade" id="deleteModal" tabIndex={-1} aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div className="modal-dialog">
          <div className="modal-content">
            <div className="modal-header">
              <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div className="text-center p-3">
              <span className='tf-icons bx bx-trash fs-1 pb-3 text-danger'></span>
              <h5>Are your sure you want to delete {userId}?</h5>
            </div>
            <div className="modal-footer">
              <button type="button" className="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" className="btn btn-danger" data-bs-dismiss="modal" onClick={()=> handleModal(userId)}>Delete</button>
            </div>
          </div>
        </div>
      </div>

    </>
  )
}

export default ManageUsers