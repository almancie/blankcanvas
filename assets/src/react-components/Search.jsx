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

  const postsList = () => posts.map((post) => 
    <li class="py-2 border-bottom">
      <a class="text-decoration-none" href={post.url}>
        <span class="badge bg-color-1 me-2" style={{width: '50px'}}>{post.subtype}</span>
        {post.title}
      </a>
    </li>
  )

  useEffect(() => {
    //
  }, [posts]);

  return (
    <div class="search-component w-100 h-100 d-flex flex-column p-3 pt-0 mt-auto justify-content-end">
      <ul class="search-results text-capitalize list-unstyled mt-2 small">
        {posts ? postsList() : <div>No Results.</div>}
      </ul>
      <div class="d-flex align-items-center w-100">
        <input 
          id="search-term" 
          type="text" 
          class="form-control rounded" 
          onChange={handleInput} 
          placeholder="Type something.."
        />
      </div>
    </div>
  )
}