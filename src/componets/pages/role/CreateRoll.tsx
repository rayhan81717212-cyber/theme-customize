
function CreateRoll() {
  return (
    <>
        <div className="container-xxl flex-grow-1 container-p-y">
              <h4 className="fw-bold py-3 mb-4"><span className="text-muted fw-light">Roles /</span> Create</h4>
              <div className="card mt-3">
                <div className="card-header">
                    <div className="card">
                        <h3>Create Role</h3>
                        <form action="" >
                            <div className="mb-3">
                                <label htmlFor="roles" className='form-label'>Roles</label>
                                <input type="text" name="roles" className='form-control'  />
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

export default CreateRoll