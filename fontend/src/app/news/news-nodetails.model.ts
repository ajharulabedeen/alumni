export class NewsNodetails {
  private id: string;
  private user_id: string;
  private title: string;
  private post_date: string;

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
   * Getter $post_date
   * @return {string}
   */
  public get $post_date(): string {
    return this.post_date;
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
   * Setter $post_date
   * @param {string} value
   */
  public set $post_date(value: string) {
    this.post_date = value;
  }


}
