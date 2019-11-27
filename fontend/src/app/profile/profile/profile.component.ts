import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { AuthService } from '../../auth/auth.service';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.scss']
})
export class ProfileComponent implements OnInit {
  constructor(private http: HttpClient, private authService: AuthService) { }

  photoEdit = false;
  selectedFile: File;
  // photo: File;
  photo: any;

  ngOnInit() {
    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
  }

  public editPhoto() {
    this.photoEdit = !this.photoEdit;
    this.getPhoto();
  }

  public onFileChanged(event) {
    this.selectedFile = event.target.files[0];
    console.log(this.selectedFile);

  }

  // public getPhoto() {
  //   console.log("Get Photo : ")
  //   this.http.get('http://127.0.0.1:8000/photo', this.authService.getHeader())
  //     .subscribe(event => {
  //       console.log(event);
  //       this.photo = event;
  //     });
  // }

  url = 'http://127.0.0.1:8000/api/photo/getPhoto';

  public getPhoto() {
    this.getImage(this.url).subscribe(data => {
      this.createImageFromBlob(data);
    }, error => {
      console.log(error);
    });
  }

  getImage(imageUrl: string): Observable<Blob> {
    // return this.http.post(imageUrl, this.authService.getHeaderFile(), {responseType : 'blob'}); //working, but to set static uName;
    return this.http.post<Blob>(imageUrl, [], this.authService.getHeaderFile());//it shows red mark but code works.
  }

  imageToShow: any;

  createImageFromBlob(image: Blob) {
    let reader = new FileReader();
    reader.addEventListener("load", () => {
      this.imageToShow = reader.result;
    }, false);

    if (image) {
      reader.readAsDataURL(image);
    }
  }

  public onUpload() {
    // this.http is the injected HttpClient
    const uploadData = new FormData();
    uploadData.append('photo', this.selectedFile, this.selectedFile.name);
    this.http.post('http://127.0.0.1:8000/api/photo/upload', uploadData, this.authService.getHeaderFile())
      .subscribe(event => {
        console.log(event);
      });
  }


}//class
