export class PaymentMobile {



  private id: string;
  private user_id: string;
  private amount: string;
  private type_ID: string;
  private date: string;
  private payment_method: string;
  private mobile_number: string;
  private trx_id: string;
  private status: string;
  private created_at: string;
  private notes: string;
  private approved_date: string;
  private event_id: string;

    /**
     * Getter $event_id
     * @return {string}
     */
	public get $event_id(): string {
		return this.event_id;
	}

    /**
     * Setter $event_id
     * @param {string} value
     */
	public set $event_id(value: string) {
		this.event_id = value;
	}




  /**
 * Getter $id
 * @return {string}
 */
  public get $id(): string {
    return this.id;
  }

  /**
   * Setter $id
   * @param {string} value
   */
  public set $id(value: string) {
    this.id = value;
  }


  /**
   * Getter $user_id
   * @return {string}
   */
  public get $user_id(): string {
    return this.user_id;
  }

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
   * Getter $status
   * @return {string}
   */
  public get $status(): string {
    return this.status;
  }

  /**
   * Getter $created_at
   * @return {string}
   */
  public get $created_at(): string {
    return this.created_at;
  }

  /**
   * Getter $notes
   * @return {string}
   */
  public get $notes(): string {
    return this.notes;
  }

  /**
   * Getter $approved_date
   * @return {string}
   */
  public get $approved_date(): string {
    return this.approved_date;
  }

  /**
   * Setter $user_id
   * @param {string} value
   */
  public set $user_id(value: string) {
    this.user_id = value;
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

  /**
   * Setter $status
   * @param {string} value
   */
  public set $status(value: string) {
    this.status = value;
  }

  /**
   * Setter $created_at
   * @param {string} value
   */
  public set $created_at(value: string) {
    this.created_at = value;
  }

  /**
   * Setter $notes
   * @param {string} value
   */
  public set $notes(value: string) {
    this.notes = value;
  }

  /**
   * Setter $approved_date
   * @param {string} value
   */
  public set $approved_date(value: string) {
    this.approved_date = value;
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
