export class About {

  private id: string;
  private user_id: string;
  private about_me: string;


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
   * Getter $about_me
   * @return {string}
   */
  public get $about_me(): string {
    return this.about_me;
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
   * Setter $about_me
   * @param {string} value
   */
  public set $about_me(value: string) {
    this.about_me = value;
  }

}
