import React from 'react';
class App extends React.Component{

  // state = {
  //   age: '',
    // details:""
  // password:"",
  // emailError:"",
  // passError:"",
  
// }
//   validate() {
//     if (!this.state.email>0 && !this.state.password>0) {
//      this.setState({emailError:"Email and Password Required"})
//     }
//     else if (!this.state.email>0) {
//       this.setState({emailError:"Email Required"})
//     }
//     else if (!this.state.password>0) {
//       this.setState({passError:"Password Required"})
//     }
//     else {
//       return true;
//   }
// }

// Changedata = (e) => {
//   let val = e.target.name;//username,phonenumber,email,city
//   let myvalue = e.target.value;//getting value
//   this.setState({ [val]: myvalue });//value set on the state
// }
//   formSubmit = (e) => {
//     e.preventDefault();
//     // console.log(this.state.email, this.state.password);
// //     if (this.validate()) {
// //       alert('Form Submit Done');
// // }
// }
  render() {
  // only array
    // const names = ['AA', 'BB', 'CC', 'DD', 'EE'];
    //json array
    const names = [
      {name:"tanmoy",age:20,grade:3.50},
      {name:"tonu",age:30,grade:3.80},
      {name:"sikder",age:40,grade:4.50},
      
    ]
    const items = names.map((item, idx) => {//item holo nam r idx holo count korbe kotogulo nam ase
      // return <li key={idx}>{ idx}{ item}</li> for array
      return <li className="list-item" key={idx}>
        Name:{item.name}, Age: {item.age}, GPA:{item.grade}
        <button className="btn btn-sm btn-info">Edit</button>|
        <button className="btn btn-sm btn-danger">Delete</button>
      </li>
    })
  return (
    <div className="App">
      <h1>Student List</h1>
      {/* <h1>{this.state.email}</h1> */}
      {/* <h1>{this.state.password}</h1> */}

      <div>
        {/* <form onSubmit={this.formSubmit}>
          <div className="form-group" style={{ marginLeft:200 }}>
            <label htmlFor="">Your Age:</label> <br />
            <select onChange={(event)=>{this.setState({age:event.target.value})}}>
              <option value=""selected disabled>Select Your Age</option>
              <option value="15-20">15-20</option>
              <option value="21-30">21-30</option>
              <option value="31-40">31-40</option>
            </select><br />
            <h6>My Age : { this.state.age}</h6>
            
            <button type="submit">Submit</button>
          </div>
        </form> */}

        <ul className="list">
           {items}
       </ul>
      </div>

    </div>
  )
}
}

export default App