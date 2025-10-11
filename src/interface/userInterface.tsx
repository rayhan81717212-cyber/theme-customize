export interface users{
    id: number,
    name: string,
    email: string,
    role: string,
    role_id: number, 
    address: string,
    photo: File | null,
    password: string
}

const userDefault: users = {
    id: 0,
            name: "",
            email: "",
            role: "",
            role_id: 0,
            address: "",
            photo: null,  
            password: ""
}
export default userDefault;

