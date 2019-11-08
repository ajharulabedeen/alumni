export class Basic {
  public id: string;
  public user_id: string;
  public dept: string;
  public batch: string;
  public student_id: string;
  public passing_year: string;
  public first_name: string;
  public last_name: string;
  public birth_date: string;
  public gender: string;
  public blood_group: string;
  public email: string;
  public phone: string;
  public address_present: string;
  public address_permanent: string;
  public research_interest: string;
  public skills: string;
  public image_address: string;
  public religion: string;
  public social_media_link: string;



  constructor(
    id: string,
    user_id: string,
    dept: string,
    batch: string,
    student_id: string,
    passing_year: string,
    first_name: string,
    last_name: string,
    birth_date: string,
    gender: string,
    blood_group: string,
    email: string,
    phone: string,
    address_present: string,
    address_permanent: string,
    research_interest: string,
    skills: string,
    image_address: string,
    religion: string,
    social_media_link: string,

  ) {
    this.id = id;
    this.user_id = user_id;
    this.dept = dept;
    this.batch = batch;
    this.student_id = student_id;
    this.passing_year = passing_year;
    this.first_name = first_name;
    this.last_name = last_name;
    this.birth_date = birth_date;
    this.gender = gender;
    this.blood_group = blood_group;
    this.email = email;
    this.phone = phone;
    this.address_present = address_present;
    this.address_permanent = address_permanent;
    this.research_interest = research_interest;
    this.skills = skills;
    this.image_address = image_address;
    this.religion = religion;
    this.social_media_link = social_media_link;
  }

  public getName() {
    return this.last_name;

  }

}//class
