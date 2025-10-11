import React, { useEffect, useState } from "react"
import api from "../../../config"
import { useParams } from "react-router-dom"
import roleDefault from "../../../interface/role.iterface"

function EditRole() {
    const [role, setRole] = useState(roleDefault)
    const params = useParams()
    const queryId = params?.id;
    
   useEffect(() => {
        getRole();
    }, []);

    const getRole = ()=>{
        
        api.get(`update-role?id=${queryId}`)
        .then((res)=>{
            console.log(res.data)
            setRole(res.data)
        })
        .catch(err=> console.log(err))
    }

    const handleSubmit = (e:React.FormEvent)=>{
        e.preventDefault();
    }

  return (
    <>
    <div className="container-xxl flex-grow-1 container-p-y">
              <h4 className="fw-bold py-3 mb-4"><span className="text-muted fw-light">Roles /</span> Edit</h4>
              <div className="card mt-3">
                <div className="card-header">
                    <div className="card">
                        <h3>Create Role</h3>
                        <form action="" onSubmit={handleSubmit}>
                            <div className="mb-3">
                                <input type="hidden" name="" id="" value={role.id}/>
                                <label htmlFor="roles" className='form-label'>Roles</label>
                                <input type="text" name="roles" className='form-control' value={role.name} onChange={(e)=> setRole({...role, name: e.target.value} )}/>
                            </div>
                            <button type='submit' className='btn btn-primary'>Update</button>
                        </form>
                    </div>
                </div>
              </div>
        </div>
    </>
  )
}

export default EditRole