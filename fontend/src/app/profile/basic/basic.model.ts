export class Basic {
  public user_id: string;
  public dept: string;
  public batch: string;
  public student_id: string;
  public first_name: string;
  public last_name: string;
  public birth_date: string;
  public gender: string;
  public blood_group: string;
  public email: string;
  public phone: string;
  public research_interest: string;
  public skills: string;
  public image_address: string;
  public religion: string;

  constructor(
     user_id: string,
     dept: string,
     batch: string,
     student_id: string,
     first_name: string,
     last_name: string,
     birth_date: string,
     gender: string,
     blood_group: string,
     email: string,
     phone: string,
     research_interest: string,
     skills: string,
     image_address: string,
     religion: string
    ){
      this.batch = batch;
      this.birth_date = birth_date;
      this.blood_group = blood_group;
      this.dept = dept;
      this.email = email;
      this.first_name = first_name;
      this.gender = gender;
      this.image_address = image_address;
      this.last_name = last_name;
      this.phone = phone;
      this.religion = religion;
      this.research_interest = research_interest;
    }

}//class
