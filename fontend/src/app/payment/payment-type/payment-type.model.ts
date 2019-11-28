export class PaymentType {
  private id: string;
  private name: string;
  private start_date: string;
  private last_date: string;
  private amount: string;
  private description: string;
  /**
   * Getter $id
   * @return {string}
   */
  public get $id(): string {
    return this.id;
  }

  /**
   * Getter $name
   * @return {string}
   */
  public get $name(): string {
    return this.name;
  }

  /**
   * Getter $start_date
   * @return {string}
   */
  public get $start_date(): string {
    return this.start_date;
  }

  /**
   * Getter $last_date
   * @return {string}
   */
  public get $last_date(): string {
    return this.last_date;
  }

  /**
   * Getter $amount
   * @return {string}
   */
  public get $amount(): string {
    return this.amount;
  }

  /**
   * Getter $description
   * @return {string}
   */
  public get $description(): string {
    return this.description;
  }

  /**
   * Setter $id
   * @param {string} value
   */
  public set $id(value: string) {
    this.id = value;
  }

  /**
   * Setter $name
   * @param {string} value
   */
  public set $name(value: string) {
    this.name = value;
  }

  /**
   * Setter $start_date
   * @param {string} value
   */
  public set $start_date(value: string) {
    this.start_date = value;
  }

  /**
   * Setter $last_date
   * @param {string} value
   */
  public set $last_date(value: string) {
    this.last_date = value;
  }

  /**
   * Setter $amount
   * @param {string} value
   */
  public set $amount(value: string) {
    this.amount = value;
  }

  /**
   * Setter $description
   * @param {string} value
   */
  public set $description(value: string) {
    this.description = value;
  }

}

