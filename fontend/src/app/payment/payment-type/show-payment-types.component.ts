import { Component, OnInit } from '@angular/core';
import { PaymentType } from './payment-type.model';
import { PaymentTypeService } from './payment-type.service';


@Component({
  selector: 'app-show-payment-types',
  templateUrl: './show-payment-types.component.html',
  styleUrls: ['./show-payment-types.component.scss']
})
export class ShowPaymentTypesComponent implements OnInit {


  name: string;
  start_date: string;
  last_date: string;
  amount: string;
  description: string;

  // ptsArray = new Array(PaymentType);
  ptsArray = new Array();

  perPage: number;
  idUpdate: string;
  updatePaymentType = false;
  ptForUpdate: PaymentType;
  pageNumber: number;
  total: number;
  totalPage: number;

  constructor(private ptService: PaymentTypeService) { }


  ngOnInit() {
  }

  public refreshTable() {
    this.setExistingPayments();
  }

  public setExistingPayments() {
    this.ptsArray = new Array();
    this.ptService.getAllPayments(this.perPage, this.pageNumber);
    this.ptService.pts.subscribe(pt => {
      this.ptsArray = [];
      for (const key1 in pt) {
        // console.log(key1);
        // console.log(pt[key1]['id']);
        var pt1 = new PaymentType();
        pt1.$id = pt[key1]["id"];
        pt1.$name = pt[key1]["name"];
        pt1.$start_date = pt[key1]["start_date"];
        pt1.$last_date = pt[key1]["last_date"];
        pt1.$description = pt[key1]["description"];
        pt1.$amount = pt[key1]["amount"];
        this.ptsArray.push(pt1);
      }
    });
    this.setTotalPaymentType();
  }//method

  public setTotalPaymentType() {
    this.ptService.getTotalCount().subscribe(res => {
      this.total = res["status"];
    });
  }

  public previousPage() {
    if (this.pageNumber > 1) {
      this.pageNumber -= 1;
      this.refreshTable();
    }
  }

  public nextPage() {
    if (this.pageNumber < (this.total / this.perPage)) {
      this.pageNumber += 1;
      this.refreshTable();
    }
  }

  public update(pt: PaymentType) {
    this.updatePaymentType = true;
    // this.addNew = false;
    console.log("PT Name : " + pt.$name);
    this.setPTForUpdate(pt);
    this.idUpdate = pt.$id;
  }

  public setPTForUpdate(pt: PaymentType) {
    this.name = pt.$name;
    this.start_date = pt.$start_date;
    this.last_date = pt.$last_date;
    this.amount = pt.$amount;
    this.description = pt.$description;

  }

  public delete(id: string) {
    this.ptService.delete(id);
    this.setExistingPayments();
    this.setTotalPaymentType();
  }

}//class
