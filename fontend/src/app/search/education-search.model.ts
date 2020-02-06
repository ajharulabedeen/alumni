export class EducationSearch {
  private _user_id: string;
  private _name: string;
  private _student_id: string;
  private _dept: string;
  private _batch: string;
  private _degree_name: string;
  private _institue_name: string;
  private _passing_year: string;

  get user_id(): string {
    return this._user_id;
  }

  set user_id(value: string) {
    this._user_id = value;
  }

  get name(): string {
    return this._name;
  }

  set name(value: string) {
    this._name = value;
  }

  get student_id(): string {
    return this._student_id;
  }

  set student_id(value: string) {
    this._student_id = value;
  }

  get dept(): string {
    return this._dept;
  }

  set dept(value: string) {
    this._dept = value;
  }

  get batch(): string {
    return this._batch;
  }

  set batch(value: string) {
    this._batch = value;
  }

  get degree_name(): string {
    return this._degree_name;
  }

  set degree_name(value: string) {
    this._degree_name = value;
  }

  get institue_name(): string {
    return this._institue_name;
  }

  set institue_name(value: string) {
    this._institue_name = value;
  }

  get passing_year(): string {
    return this._passing_year;
  }

  set passing_year(value: string) {
    this._passing_year = value;
  }
}
