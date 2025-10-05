import React, { useEffect, useState } from 'react'
import api from '../../../config'
import type { role, users } from '../../../interface';
import userDefault from '../../../interface';

function CreateUsers() {

    useEffect(()=>{
        getRoles();
    },[])

    const [roles, setRoles] = useState<role[]>([])
    const getRoles = ()=>{
        api.get("roles")
        .then((res)=>{
           console.log(res.data) 
           setRoles(res.data)
        })
        .catch((err => console.log(err)))
    }

    const [user, setUser] = useState<users>(userDefault);


        const handleSubmit = (e: React.FormEvent)=>{
            e.preventDefault()
            console.log(user)
            const formdata = new FormData();
            formdata.append("name", user.name);
            formdata.append("email", user.email);
            formdata.append("address", user.address);
            formdata.append("role_id", user.role_id.toString());
            if (user.photo) formdata.append ("photo", user.photo);
            // console.log(formdata);

            api.post("create-users", formdata)
            .then((res)=>{
                console.log(res.data);
                // setUser(res.data);
            })
            .catch((err)=>{
                console.log(err)
            })
        }



  return (
    <>
         <div className="container-xxl flex-grow-1 container-p-y">
              <h4 className="fw-bold py-3 mb-4"><span className="text-muted fw-light">Users /</span> Create</h4>
              <div className="card mt-3">
                <div className="card-header">
                    <div className="card">
                        <h3>Create Users</h3>
                        <form action="" onSubmit={handleSubmit}>
                            <div className="mb-3">
                                <label htmlFor="name" className='form-label'>Name</label>
                                <input type="text" name="name" className='form-control' value={user.name} onChange={(e) => setUser({ ...user, name: e.target.value })} />

                            </div>
                            <div className="mb-3">
                                <label htmlFor="email" className='form-label'>Email</label>
                                <input type="text" name="email" className='form-control' value={user.email} onChange={(e)=>setUser({...user, email: e.target.value})} />
                            </div>
                            <div className="mb-3">
                                <label htmlFor="email" className='form-label'>Role</label>
                                <select name="roles" className='form-control' value={user.role_id} onChange={(e)=>setUser({...user, role_id:parseInt (e.target.value)})}>
                                    <option value="">Select your Roles</option>
                                    {
                                        roles.map(item => (
                                            <option key={item.id} value={item.id}>{item.name}</option>
                                        ))
                                    }
                                </select>
                            </div>
                            <div className="mb-3">
                                <label htmlFor="address" className='form-label'>Address</label>
                                <textarea name="address" className='form-control' value={user.address} onChange={(e)=> setUser({...user, address: e.target.value}) } />
                            </div>
                            <div className="mb-3">
                                <label htmlFor="photo" className='form-label'>Photo</label>
                               <input 
                                    type="file" 
                                    className='form-control' 
                                    onChange={(e) => {
                                        if (e.target.files && e.target.files[0]) {
                                        setUser({ ...user, photo: e.target.files[0] });
                                        }
                                    }} 
                                    />

                            </div>
                            <button type='submit' className='btn btn-primary'>Submit</button>
                        </form>
                    </div>
                </div>
              </div>
        </div>
    </>
  )
}

export default CreateUsers