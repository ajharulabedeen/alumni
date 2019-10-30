import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FileUploaderTestComponent } from './file-uploader-test.component';

describe('FileUploaderTestComponent', () => {
  let component: FileUploaderTestComponent;
  let fixture: ComponentFixture<FileUploaderTestComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FileUploaderTestComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FileUploaderTestComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
