import {useEffect, useState} from 'react';

export default function() {

  // Posts
  const [posts, setPosts] = useState([]);

  // Get posts from server
  async function getPosts(term) {
    if (! term) return [];

    return await fetch(`${bc.home}/wp-json/wp/v2/search?search=${term}`)
      .then(response => {
        return response.json();
      }).then(posts => {
        return posts;
      })
  }

  // Handle user input
  async function handleInput(e) {
    let posts = await getPosts(e.target.value);

    setPosts(posts);
  }

  const postList = () => posts.map((post, index) => 
    <li className={"py-2" + ((index + 1) < posts.length ? ' border-bottom' : '')}>
      <a className="text-decoration-none" href={post.url}>
        <span className="badge bg-color-1 me-2" style={{width: '50px'}}>{post.subtype}</span>
        {post.title}
      </a>
    </li>
  )

  useEffect(() => {
    //
  }, [posts]);

  return (
    <div className="search-component w-100 h-100 d-flex flex-column p-3 pt-0 mt-auto justify-content-end">
      <ul className="search-results text-capitalize list-unstyled mt-2 small">
        {posts ? postList() : <div>No Results.</div>}
      </ul>
      <div className="search-form-control d-flex align-items-center w-100 border rounded p-2">
        <input 
          id="search-term" 
          type="text" 
          className="form-control border-0 shadow-0" 
          onChange={handleInput} 
          placeholder="Type something.."
        />
        <button type="submit" className="btn btn-color-1 ms-2 d-flex">
          <i className='bi bi-arrow-right' />
        </button>
      </div>
    </div>
  )
}