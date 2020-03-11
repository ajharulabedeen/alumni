import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SuperLogginComponent } from './super-loggin.component';

describe('SuperLogginComponent', () => {
  let component: SuperLogginComponent;
  let fixture: ComponentFixture<SuperLogginComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SuperLogginComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SuperLogginComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
