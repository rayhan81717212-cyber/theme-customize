import React, { useState } from 'react'

function Createpost() {

const [title, setTitle] = useState<string>("");
const [body, setBody] = useState<string>("")
document.title = "create-post"

function postData(){
    alert("Hi Rahat Boss")
}

  return (
    <>
        <div className="container-xxl flex-grow-1 container-p-y">
              <h4 className="fw-bold py-3 mb-4"><span className="text-muted fw-light">Posts /</span> Create</h4>
              <div className="card mt-3">
                <div className="card-header">
                    <div className="card">
                        <form action="" onSubmit={postData}>
                            <div className="mb-3">
                                <label htmlFor="title" className='form-label'>Title</label>
                                <input type="text" name="title" className='form-control' />
                            </div>
                            <div className="mb-3">
                                <label htmlFor="title" className='form-label'>Body</label>
                                <textarea  name="title" className='form-control' rows={4}> </textarea>
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

export default Createpost