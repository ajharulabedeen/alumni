import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EventsPublicComponent } from './events-public.component';

describe('EventsPublicComponent', () => {
  let component: EventsPublicComponent;
  let fixture: ComponentFixture<EventsPublicComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EventsPublicComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EventsPublicComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
