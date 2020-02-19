import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EventDetailsUserComponent } from './event-details-user.component';

describe('EventDetailsUserComponent', () => {
  let component: EventDetailsUserComponent;
  let fixture: ComponentFixture<EventDetailsUserComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EventDetailsUserComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EventDetailsUserComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
