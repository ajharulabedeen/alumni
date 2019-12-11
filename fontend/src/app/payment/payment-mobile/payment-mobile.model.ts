export class PaymentMobile {

  private amount: string;
  private type_ID: string;
  private date: string;
  private payment_method: string;
  private mobile_number: string;
  private trx_id: string;

  /**
   * Getter $amount
   * @return {string}
   */
  public get $amount(): string {
    return this.amount;
  }

  /**
   * Getter $type_ID
   * @return {string}
   */
  public get $type_ID(): string {
    return this.type_ID;
  }

  /**
   * Getter $date
   * @return {string}
   */
  public get $date(): string {
    return this.date;
  }

  /**
   * Getter $payment_method
   * @return {string}
   */
  public get $payment_method(): string {
    return this.payment_method;
  }

  /**
   * Getter $mobile_number
   * @return {string}
   */
  public get $mobile_number(): string {
    return this.mobile_number;
  }

  /**
   * Getter $trx_id
   * @return {string}
   */
  public get $trx_id(): string {
    return this.trx_id;
  }

  /**
   * Setter $amount
   * @param {string} value
   */
  public set $amount(value: string) {
    this.amount = value;
  }

  /**
   * Setter $type_ID
   * @param {string} value
   */
  public set $type_ID(value: string) {
    this.type_ID = value;
  }

  /**
   * Setter $date
   * @param {string} value
   */
  public set $date(value: string) {
    this.date = value;
  }

  /**
   * Setter $payment_method
   * @param {string} value
   */
  public set $payment_method(value: string) {
    this.payment_method = value;
  }

  /**
   * Setter $mobile_number
   * @param {string} value
   */
  public set $mobile_number(value: string) {
    this.mobile_number = value;
  }

  /**
   * Setter $trx_id
   * @param {string} value
   */
  public set $trx_id(value: string) {
    this.trx_id = value;
  }




  // fields in migration.refactor; have to remove in productiion code.
  // id
  // user_id
  // amount
  // type_ID
  // date
  // payment_method
  // mobile_number
  // trx_id
  // status
  // notes
  // approved_date


}//class
