 class Api { 
  constructor() {
      this.api = "http://127.0.0.1:8100/api/"; //dev api
  }
  getDatabaseSetupEndPoint() {
      return this.api+"config/database_setup.php";
  }

  getCandidateInArtEndpoint() {
    return this.api+"candidates_art.php";
  }

  getCandidateInScienceEndpoint() {
    return this.api+"candidates_science.php";
  }

  getCandidateInCommercialEndpoint() {
    return this.api+"candidates_commercial.php";
  }

  getCandidateAndTheirSubjectEndpoint() {
    return this.api+"candidates_subject.php";
  }

  getCandidateAndTheirCenterEndpoint() {
    return this.api+"candidates_center.php";
  }
  getFibonacciSeriesEndpoint(number){
    return this.api+"fibonacci_series.php?fbNum="+number;
  }
}

document.addEventListener('DOMContentLoaded', function() {

let x = new Api();
const student_center_section = document.querySelector('#student_center_section'),
      student_subject_section = document.querySelector('#student_subject_section'),
      student_science_section = document.querySelector('#student_science_section'),
      student_art_section = document.querySelector('#student_art_section'),
      student_commercial_section = document.querySelector('#student_commercial_section'),
      students_center_button = document.querySelector('#students_center_button');
      students_subject_button = document.querySelector('#students_subject_button');
      students_art_class_button = document.querySelector('#students_art_class_button');
      students_commercial_class_button = document.querySelector('#students_commercial_class_button');
      students_science_class_button = document.querySelector('#students_science_class_button');
      fibonacci_series_button = document.querySelector('#fibonacci_series_button');
      fbNumInput = document.querySelector('#fbNum');
      
  function removeAllSection(){
    student_center_section.style.display = "none";
    student_subject_section.style.display = "none";
    student_science_section.style.display = "none";
    student_art_section.style.display = "none";
    student_commercial_section.style.display = "none";
    fibonacci_series_section.style.display = "none";
  }

  function showASection(section){
    section.style.display = "block";
  }
  removeAllSection();

students_center_button.addEventListener('click', () => {
  let table = document.getElementById("student_center_table_body");
      table.innerHTML ='';
  fetch(x.getCandidateAndTheirCenterEndpoint(), {
    method: 'GET',
    headers: {
      'Content-type': 'application/json; charset=UTF-8'
    }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    }
    return Promise.reject(response);
  }).then(function (data) {
    if(data.status != 404){
      //SET CONTENT TO DISPLAY
      for (let index = 0; index < data.length; index++) {
         // Create an empty <tr> element and add it to the 1st position of the table:
        let row = table.insertRow(index);
        // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);
        let cell3 = row.insertCell(2);
        // Add some text to the new cells:
        cell1.innerHTML = index + 1;
        cell2.innerHTML = data[index]['candidate_name'];
        cell3.innerHTML = data[index]['center_name'];
      }
     
    }else{
      alert(data.error);
    }
  }).catch(function (error)  {
    alert(error);
  });

  removeAllSection();
  showASection(student_center_section);
});

students_subject_button.addEventListener('click', () => {
  let table = document.getElementById("student_subject_table_body");
  table.innerHTML = '';
  fetch(x.getCandidateAndTheirSubjectEndpoint(), {
    method: 'GET',
    headers: {
      'Content-type': 'application/json; charset=UTF-8'
    }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    }
    return Promise.reject(response);
  }).then(function (data) {
    if(data.status != 404){
      //SET CONTENT TO DISPLAY
      for (let index = 0; index < data.length; index++) {
         // Create an empty <tr> element and add it to the 1st position of the table:
        let row = table.insertRow(index);
        // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);
        let cell3 = row.insertCell(2);
        let cell4 = row.insertCell(3);
        
        let offeredSubjects='';
        for (let indexSubj = 0; indexSubj < data[index]['subject'].length; indexSubj++) {
          if(offeredSubjects != ''){
            offeredSubjects  = offeredSubjects +', '+data[index]['subject'][indexSubj]['subject_name'];
          }else{
            offeredSubjects  = data[index]['subject'][indexSubj]['subject_name'];
          }
        }

        // Add some text to the new cells:
        cell1.innerHTML = index + 1;
        cell2.innerHTML = data[index]['name'];
        cell3.innerHTML = data[index]['category'];
        cell4.innerHTML = offeredSubjects;
      }
    }else{
      alert(data.error);
    }
  }).catch(function (error)  {
    alert(error);
  });

  removeAllSection();
  showASection(student_subject_section);
  
});

students_art_class_button.addEventListener('click', () => {
  let table = document.getElementById("student_art_table_body");
  table.innerHTML = '';
  fetch(x.getCandidateInArtEndpoint(), {
    method: 'GET',
    headers: {
      'Content-type': 'application/json; charset=UTF-8'
    }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    }
    return Promise.reject(response);
  }).then(function (data) {
    if(data.status != 404){
      //SET CONTENT TO DISPLAY
      for (let index = 0; index < data.length; index++) {
         // Create an empty <tr> element and add it to the 1st position of the table:
        let row = table.insertRow(index);
        // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);
        // Add some text to the new cells:
        cell1.innerHTML = index + 1;
        cell2.innerHTML = data[index]['candidate_name'];
      }
    }else{
      alert(data.error);
    }
  }).catch(function (error)  {
    alert(error);
  });

  removeAllSection();
  showASection(student_art_section);
});

students_commercial_class_button.addEventListener('click', () => {
  let table = document.getElementById("student_commercial_table_body");
  table.innerHTML = '';
  fetch(x.getCandidateInCommercialEndpoint(), {
    method: 'GET',
    headers: {
      'Content-type': 'application/json; charset=UTF-8'
    }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    }
    return Promise.reject(response);
  }).then(function (data) {
    if(data.status != 404){
      //SET CONTENT TO DISPLAY
      for (let index = 0; index < data.length; index++) {
         // Create an empty <tr> element and add it to the 1st position of the table:
        let row = table.insertRow(index);
        // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);
        // Add some text to the new cells:
        cell1.innerHTML = index + 1;
        cell2.innerHTML = data[index]['candidate_name'];
      } 
    }else{
      alert(data.error);
    }
  }).catch(function (error)  {
    alert(error);
  });

  removeAllSection();
  showASection(student_commercial_section);
  
});

students_science_class_button.addEventListener('click', () => {
  let table = document.getElementById("student_science_table_body");
  table.innerHTML = '';
  fetch(x.getCandidateInScienceEndpoint(), {
    method: 'GET',
    headers: {
      'Content-type': 'application/json; charset=UTF-8'
    }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    }
    return Promise.reject(response);
  }).then(function (data) {
    if(data.status != 404){
      //SET CONTENT TO DISPLAY
      for (let index = 0; index < data.length; index++) {
         // Create an empty <tr> element and add it to the 1st position of the table:
        let row = table.insertRow(index);
        // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);
        // Add some text to the new cells:
        cell1.innerHTML = index + 1;
        cell2.innerHTML = data[index]['candidate_name'];
      }
    }else{
      alert(data.error);
    }
  }).catch(function (error)  {
    alert(error);
  });

  removeAllSection();
  showASection(student_science_section);
});

fibonacci_series_button.addEventListener('click', () => {
  if(fbNumInput.value == 0 || fbNumInput.value > 0){
  getAndShowFibonacciSeries(fbNumInput.value);
  }
  
  removeAllSection();
  showASection(fibonacci_series_section);
});

fbNumInput.addEventListener('keyup', () => {
  if(fbNumInput.value == 0 || fbNumInput.value > 0){
    getAndShowFibonacciSeries(fbNumInput.value);
    }
});


function getAndShowFibonacciSeries(number){
  let tableRow = document.getElementById("fibonacci_series_result");
  fetch(x.getFibonacciSeriesEndpoint(number), {
    method: 'GET',
    headers: {
      'Content-type': 'application/json; charset=UTF-8'
    }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    }
    return Promise.reject(response);
  }).then(function (data) {
    if(data.status != 404){
      //SET CONTENT TO DISPLAY
        tableRow.innerHTML = data;
    }else{
      alert(data.error);
    }
  }).catch(function (error)  {
    alert(error);
  });
}

})