export class PaymentMobile {
  private id: string;
  private amount: string;
  private date: string;
  private paymentMethod: string;
  private trxID: string;

  /**
   * Getter $id
   * @return {string}
   */
  public get $id(): string {
    return this.id;
  }

  /**
   * Getter $amount
   * @return {string}
   */
  public get $amount(): string {
    return this.amount;
  }

  /**
   * Getter $date
   * @return {string}
   */
  public get $date(): string {
    return this.date;
  }

  /**
   * Getter $paymentMethod
   * @return {string}
   */
  public get $paymentMethod(): string {
    return this.paymentMethod;
  }

  /**
   * Getter $trxID
   * @return {string}
   */
  public get $trxID(): string {
    return this.trxID;
  }

  /**
   * Setter $id
   * @param {string} value
   */
  public set $id(value: string) {
    this.id = value;
  }

  /**
   * Setter $amount
   * @param {string} value
   */
  public set $amount(value: string) {
    this.amount = value;
  }

  /**
   * Setter $date
   * @param {string} value
   */
  public set $date(value: string) {
    this.date = value;
  }

  /**
   * Setter $paymentMethod
   * @param {string} value
   */
  public set $paymentMethod(value: string) {
    this.paymentMethod = value;
  }

  /**
   * Setter $trxID
   * @param {string} value
   */
  public set $trxID(value: string) {
    this.trxID = value;
  }
}
