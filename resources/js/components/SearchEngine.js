import React, {Component} from 'react';
import ReactDOM from 'react-dom';


/**
 *  Stateless functional components
 * @param website
 * @returns {*}
 * @constructor
 */
const WebsiteItem = ({website}) => (
    <div className="mt-5" key={website['id']}>
        <div>
            <h4>
                <a href={website['url']} target="_blank">{website['title']}</a>
            </h4>
        </div>
        <div>
            <span className='result-url'>{website['url']}</span>
        </div>
        <div>
            {website['description'].substring(0, 159) + "..."}
        </div>
    </div>
);


/**
 * SearchEngine Component.
 *
 * Show list of websites.
 *
 */
export default class SearchEngine extends Component {
    render() {
        const websites = this.props.data;
        return (

            <div>

                {
                    websites.map(function (item, i) {
                        return (
                            <WebsiteItem website={item} />
                        )

                    })
                }


            </div>


        );
    }
}

if (document.getElementById('search-engine')) {

    // find element by id
    const element = document.getElementById('search-engine');

    //console.log(element.dataset.props);
    const props = JSON.parse(element.dataset.props);
    //console.log(props);
    delete element.dataset.props;

    // render element with props
    ReactDOM.render(<SearchEngine {...props}/>, element);

}
