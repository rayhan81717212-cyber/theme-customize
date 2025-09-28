import axios from 'axios';
import React, { useState } from 'react'
import { Link, useParams } from 'react-router-dom'



function DetailsPost() {

    let [id, setId] = useState<number>(0)
    let [userId, setUserId] = useState<number>(0)
    let [title, setTitle] = useState<string>("")
    let [body, setBody] = useState<string>("")

    const params = useParams<string>()
    const query_id = params?.id;

    axios.get(`https://jsonplaceholder.typicode.com/posts/${query_id}`)
    .then((res)=>{
        // console.log(res.data);
        let data = res.data;
        setId(data.id);
        setUserId(data.userId);
        setTitle(data.title);
        setBody(data.body)
    })
    .catch((err)=>{
        console.log(err)
    })
  return (
    <>
        <div className="container-xxl flex-grow-1 container-p-y">
              <h4 className="fw-bold py-3 mb-4"><Link to={"/managePost"} className="text-muted fw-light">Posts /</Link> Details</h4>
              <div className="card mt-3">
                <h4 className="card-header">
                    Post Details <span></span>
                </h4>
                <div className="card-body">
                    <div className="card-text"><b>Id</b>{id}</div>
                    <div className="card-text"><b>User Id</b>{userId}</div>
                    <div className="card-text"><b>Title</b>{title}</div>
                    <div className="card-text"><b>Body</b>{body}</div>
                </div>
              </div>
        </div>
    </>
  )
}

export default DetailsPost