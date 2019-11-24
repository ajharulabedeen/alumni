export class Jobs {

  private id: string;
  private user_id: string;
  private organization_name: string;
  private type: string;
  private role: string;
  private started: string;
  private leave: string;
  private current_status: string;

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
   * Getter $organization_name
   * @return {string}
   */
  public get $organization_name(): string {
    return this.organization_name;
  }

  /**
   * Getter $type
   * @return {string}
   */
  public get $type(): string {
    return this.type;
  }

  /**
   * Getter $role
   * @return {string}
   */
  public get $role(): string {
    return this.role;
  }

  /**
   * Getter $started
   * @return {string}
   */
  public get $started(): string {
    return this.started;
  }

  /**
   * Getter $leave
   * @return {string}
   */
  public get $leave(): string {
    return this.leave;
  }

  /**
   * Getter $current_status
   * @return {string}
   */
  public get $current_status(): string {
    return this.current_status;
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
   * Setter $organization_name
   * @param {string} value
   */
  public set $organization_name(value: string) {
    this.organization_name = value;
  }

  /**
   * Setter $type
   * @param {string} value
   */
  public set $type(value: string) {
    this.type = value;
  }

  /**
   * Setter $role
   * @param {string} value
   */
  public set $role(value: string) {
    this.role = value;
  }

  /**
   * Setter $started
   * @param {string} value
   */
  public set $started(value: string) {
    this.started = value;
  }

  /**
   * Setter $leave
   * @param {string} value
   */
  public set $leave(value: string) {
    this.leave = value;
  }

  /**
   * Setter $current_status
   * @param {string} value
   */
  public set $current_status(value: string) {
    this.current_status = value;
  }

}//class
