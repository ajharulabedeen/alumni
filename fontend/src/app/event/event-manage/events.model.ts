export class Events {
  private id: string;
  private user_id: string;
  private title: string;
  private start_date: string;
  private end_date: string;
  private fee: string;
  private location: string;
  private description: string;

  /**
   * Getter $notes
   * @return {string}
   */
  public get $notes(): string {
    return this.notes;
  }

  /**
   * Setter $notes
   * @param {string} value
   */
  public set $notes(value: string) {
    this.notes = value;
  }

  private notes: string;

  /**
   * Getter $id
   * @return {string}
   */
  public get $id(): string {
    return this.id;
  }

  /**
   * Getter $user_id
   * @return {string}
   */
  public get $user_id(): string {
    return this.user_id;
  }

  /**
   * Getter $title
   * @return {string}
   */
  public get $title(): string {
    return this.title;
  }

  /**
   * Getter $start_date
   * @return {string}
   */
  public get $start_date(): string {
    return this.start_date;
  }

  /**
   * Getter $end_date
   * @return {string}
   */
  public get $end_date(): string {
    return this.end_date;
  }

  /**
   * Getter $fee
   * @return {string}
   */
  public get $fee(): string {
    return this.fee;
  }

  /**
   * Getter $location
   * @return {string}
   */
  public get $location(): string {
    return this.location;
  }

  /**
   * Getter $description
   * @return {string}
   */
  public get $description(): string {
    return this.description;
  }

  /**
   * Getter $images
   * @return {string}
   */
  public get $images(): string {
    return this.images;
  }

  /**
   * Setter $id
   * @param {string} value
   */
  public set $id(value: string) {
    this.id = value;
  }

  /**
   * Setter $user_id
   * @param {string} value
   */
  public set $user_id(value: string) {
    this.user_id = value;
  }

  /**
   * Setter $title
   * @param {string} value
   */
  public set $title(value: string) {
    this.title = value;
  }

  /**
   * Setter $start_date
   * @param {string} value
   */
  public set $start_date(value: string) {
    this.start_date = value;
  }

  /**
   * Setter $end_date
   * @param {string} value
   */
  public set $end_date(value: string) {
    this.end_date = value;
  }

  /**
   * Setter $fee
   * @param {string} value
   */
  public set $fee(value: string) {
    this.fee = value;
  }

  /**
   * Setter $location
   * @param {string} value
   */
  public set $location(value: string) {
    this.location = value;
  }

  /**
   * Setter $description
   * @param {string} value
   */
  public set $description(value: string) {
    this.description = value;
  }

  /**
   * Setter $images
   * @param {string} value
   */
  public set $images(value: string) {
    this.images = value;
  }

  private images: string;

}
