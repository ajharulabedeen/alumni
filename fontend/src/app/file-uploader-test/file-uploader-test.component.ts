import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpHeaders } from '@angular/common/http';


@Component({
  selector: 'app-file-uploader-test',
  templateUrl: './file-uploader-test.component.html',
  styleUrls: ['./file-uploader-test.component.scss']
})
export class FileUploaderTestComponent implements OnInit {


  constructor(private http : HttpClient) { }

  ngOnInit() {
  }


  selectedFile: File;

  onFileChanged(event) {
    console.log(event);
    this.selectedFile = event.target.files[0];
  }

  onUpload() {
    // upload code goes here
    // this.http is the injected HttpClient
  const uploadData = new FormData();
  uploadData.append('photo', this.selectedFile, this.selectedFile.name);
  // this.http.post('http://127.0.0.1:8000/api/t', uploadData,{
  this.http.post('http://127.0.0.1:8000/api/uploadfile', uploadData,{
    headers: new HttpHeaders({
            'Authorization' : 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU3MTkyODg2MywiZXhwIjoxNTcxOTMyNDYzLCJuYmYiOjE1NzE5Mjg4NjMsImp0aSI6ImN3aGdnQ0xRZG9nZlNzN2YiLCJzdWIiOjIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.JI-XHdIbD1ry3ajrRECoCp_cnkMR-kPDKNhJD6c0ulk'
          })
  })
    .subscribe(event => {
      console.log(event); // handle event here
    });
  }



}//class
