import axios from 'axios';
import React, { useEffect, useState } from 'react'

function Createpost() {

const [title, setTitle] = useState<string>("");
const [body, setBody] = useState<string>("")
document.title = "create-post"

function postData(e:React.FormEvent){
    (e).preventDefault()
    // alert("From submit successfully")
    // console.log ("title: " + title) 
    // console.log(" Body: " + body)

    const data = {title, body};
    axios.post('https://jsonplaceholder.typicode.com/posts', data)
    .then((res)=>{
        console.log(res.data);
        setTitle("");
        setBody("");
        alert("Data Save SuccessFully")
    })
    .catch((error)=>{
        console.log(error)
    })

}
// useEffect(()=>{
//     console.log ("title: " + title) 
//     console.log(" Body: " + body)
// },[title,body])

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
                                <input type="text" name="title" className='form-control' value={title} onChange={(e)=>{setTitle(e.target.value)}} required/>
                            </div>
                            <div className="mb-3">
                                <label htmlFor="title" className='form-label'>Body</label>
                                <textarea  name="title" className='form-control' rows={4} value={body} onChange={(e)=>{setBody(e.target.value)}} required> </textarea>
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