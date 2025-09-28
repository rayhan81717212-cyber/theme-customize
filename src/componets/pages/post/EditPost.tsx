import axios from 'axios';
import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom'

function EditPost() {

    // const [id, setId] = useState<number>(0);
    // const [userId, setUserId] = useState<number>(0);
    // const [body, setBody] = useState<string>("");
    // const [title, setTitle] = useState<string>("");
    const [post, setPost] = useState(
        {
            userId: 0,
            title:"",
            body:""
        }
    )

    const params = useParams<string>()
    const query_id = params?.id;
    useEffect(()=>{
        axios.get(`https://jsonplaceholder.typicode.com/posts/${query_id}`)

    .then((res)=>{
        const data = res.data;
          setPost(data);
    })
    },[query_id])

    // update Data 
     const handleSubmit = (e:React.FormEvent)=>{
        e.preventDefault()
        console.log(post)
        
     }


  return (
    <>
        <div className="container-xxl flex-grow-1 container-p-y">
              <h4 className="fw-bold py-3 mb-4"><span className="text-muted fw-light">Posts /</span> Update</h4>
              <div className="card mt-3">
                <div className="card-header">
                    <div className="card">
                        <form action="" onSubmit={handleSubmit}>
                            <div className="mb-3">
                                <label htmlFor="title" className='form-label'>Title</label>
                                <input type="text" name="title" className='form-control'  value={post.title} onChange={(e)=>setPost({...post, title: e.target.value})}/>
                            </div>
                            <div className="mb-3">
                                <label htmlFor="title" className='form-label'>Body</label>
                                <textarea  name="title" className='form-control' rows={4} value={post.body} onChange={(e)=>setPost({...post, body: e.target.value})} > </textarea>
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

export default EditPost