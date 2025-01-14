import React from 'react'

const AdminPage = () => {
  const isAdmin = true;

  return (
    <div>
      {isAdmin ? <div>AdminPage</div> : <div>Access Denied</div>}
    </div>
  )
}

export default AdminPage