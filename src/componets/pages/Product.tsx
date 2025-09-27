import React, { useEffect } from 'react'

function Product() {
    useEffect(()=>{
        document.title="Pruduct"
    },[])
  return (
    <div>Product</div>
  )
}

export default Product