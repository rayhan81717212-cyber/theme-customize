import axios from 'axios';
import React, { useEffect, useState } from 'react'
import { Link } from 'react-router-dom';

function ManagePosts() {
  let [posts, setPosts] = useState([]);

  useEffect(() => {
    document.title = "Manage Posts";
    // loadData();
    getData();
  }, []); // Run once on mount

//   useEffect(() => {
//     console.log(posts)
//   }, [posts]);
  // fetch API
//   async function loadData() {
//     try {
//       const res = await fetch('https://jsonplaceholder.typicode.com/posts');
//       const data = await res.json();
//     //   console.log(data);
//       setPosts(data);
//     } catch (error) {
//       console.error('Error fetching data:', error);
//     }
//   }

//Axios API
//=====================

function getData(){
    axios.get('https://jsonplaceholder.typicode.com/posts')
    .then((res)=>{
        //  console.log(res.data)
        setPosts(res.data)
    }).catch((err)=>{
        console.log(err);
    })
}

  return (
    <>
        <div className="container-xxl flex-grow-1 container-p-y">
              <h4 className="fw-bold py-3 mb-4"><span className="text-muted fw-light">Posts /</span> Manage</h4>
              <Link to={"/create-post"} className='btn btn-success'>Add New</Link>
              <div className="card mt-3">
                <div className="table-responsive">
                    <table className="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                {
                                    posts.map((item:any) => (
                                        <tr key={item.id}>
                                        <td>{item.id}</td>
                                        <td>{item.title}</td>
                                        <td>{item.body}</td>
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
  )
}

export default ManagePosts