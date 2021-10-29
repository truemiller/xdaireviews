import React, {useEffect, useState} from 'react';
import ReactDOM from 'react-dom';
import "bootswatch/dist/zephyr/bootstrap.css";
import {Button} from "react-bootstrap";
import axios from "axios";
import {BrowserRouter, Link, Route, Switch} from "react-router-dom";
import "react-lazy-load-image-component";


class Config {
    constructor() {
        this.url = "//xdaireviews.test/"
        this.api = this.url + "api/"
        this.apiUpvote = this.api + "upvote/"
        this.apiProjects = this.api + "projects/"
    }
}

const config = new Config()

function App() {
    return <Home/>
}

function Home() {
    const [upvote, setUpvote] = useState(0)

    async function getProjects() {
        return await axios.get(config.apiProjects).then(r => {
            return r.data
        })
    }

    async function postUpvote(id) {
        await axios.post(config.apiUpvote, {id: id}).then(r => console.log(r))
        setUpvote(upvote+1)
    }

    const [projects, setProjects] = useState([{id:null, slug: null, name: null, logo: null, description: null, url: null}])

    useEffect(() => {
        getProjects().then(r => setProjects(r))
    }, [upvote])

    return <BrowserRouter>
        <header>
            <div className="navbar navbar-expand-lg bg-light">
                <div className="container">
                    <Link to={"/"} className="navbar-brand">
                        xDai Reviews
                    </Link>
                    <Link to={"/about"}>
                        About
                    </Link>
                </div>
            </div>
        </header>
        <article className={"container"}>
            <Switch>
                <Route exact path={"/"}>
                    <section className="mt-3">
                        <h1 className={"display-2 fw-bolder"}>xDai Reviews</h1>
                        <p>Reviews for xDai blockchain projects</p>
                    </section>
                    <section className="mt-3">
                        <h2>Top Projects</h2>
                        <div className="row">
                            {
                                projects.map(project => {
                                    return <div key={project.slug} className={"col-md-4"}>
                                        <div className="card my-1">
                                            <div className="card-body">
                                                <Button variant={"light"}
                                                        onClick={() => postUpvote(project.id)}>❤️ {project.rating}</Button>
                                                <div className="d-inline ms-3">
                                                    <img loading={"lazy"} className={"rounded-circle"}
                                                         src={project.logo}
                                                         width={55} height={55} alt={`${project.name} logo`}/>
                                                </div>
                                                <div className={"d-inline ms-3"}>
                                                    <a href={project.url}>{project.name}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                })
                            }
                        </div>
                    </section>
                </Route>
                <Route exact path={"/about"}>
                    xDai review is a part of a large set of review apps. Geared at crowdsourcing sentiment towards
                    different projects. Enabling investors to make better decisions.
                </Route>
            </Switch>
        </article>
    </BrowserRouter>
}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App/>, document.getElementById('app'));
}
