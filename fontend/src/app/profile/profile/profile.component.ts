import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { AuthService } from '../../auth/auth.service';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.scss']
})
export class ProfileComponent implements OnInit {
  constructor(private http: HttpClient, private authService: AuthService) { }

  photoEdit = false;
  selectedFile: File;

  ngOnInit() {
    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
  }

  public editPhoto() {
    this.photoEdit = !this.photoEdit;
  }

  public onFileChanged(event) {
    this.selectedFile = event.target.files[0];
    console.log(this.selectedFile);

  }

  onUpload() {
    // this.http is the injected HttpClient
    const uploadData = new FormData();
    uploadData.append('photo', this.selectedFile, this.selectedFile.name);
    // this.http.post('http://127.0.0.1:8000/api/photo/upload', { 'photo' : this.selectedFile }, this.authService.getHeader())
    //   .subscribe(event => {
    //     console.log(event);
    //   });
    this.http.post('http://127.0.0.1:8000/api/photo/upload', uploadData, this.authService.getHeaderFile())
      .subscribe(event => {
        console.log(event);
      });
  }


}//class
