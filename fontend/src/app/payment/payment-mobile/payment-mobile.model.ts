export class PaymentMobile {
  private paymentType_id: string;
  private amount: string;
  private date: string;
  private paymentMethod: string;
  private trxID: string;
  private mobileNumber: string;

  /**
   * Getter $paymentType_id
   * @return {string}
   */
  public get $paymentType_id(): string {
    return this.paymentType_id;
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
   * Getter $mobileNumber
   * @return {string}
   */
  public get $mobileNumber(): string {
    return this.mobileNumber;
  }

  /**
   * Setter $paymentType_id
   * @param {string} value
   */
  public set $paymentType_id(value: string) {
    this.paymentType_id = value;
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

  /**
   * Setter $mobileNumber
   * @param {string} value
   */
  public set $mobileNumber(value: string) {
    this.mobileNumber = value;
  }



}
